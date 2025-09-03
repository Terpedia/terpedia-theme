<?php
/**
 * Version Management System for Terpedia Theme
 */

class TerpediaThemeVersionManager {
    
    const STYLE_CSS_PATH = __DIR__ . '/style.css';
    const FUNCTIONS_PHP_PATH = __DIR__ . '/functions.php';
    
    public static function getCurrentVersion() {
        $style_content = file_get_contents(self::STYLE_CSS_PATH);
        if (preg_match('/Version:\s*([0-9]+\.[0-9]+\.[0-9]+)/', $style_content, $matches)) {
            return $matches[1];
        }
        return '1.0.0';
    }
    
    public static function incrementVersion($version_type = 'patch') {
        $current_version = self::getCurrentVersion();
        $version_parts = explode('.', $current_version);
        
        $major = intval($version_parts[0]);
        $minor = intval($version_parts[1]);
        $patch = intval($version_parts[2]);
        
        switch ($version_type) {
            case 'major':
                $major++;
                $minor = 0;
                $patch = 0;
                break;
            case 'minor':
                $minor++;
                $patch = 0;
                break;
            case 'patch':
            default:
                $patch++;
                break;
        }
        
        $new_version = "{$major}.{$minor}.{$patch}";
        self::updateVersion($new_version);
        return $new_version;
    }
    
    public static function updateVersion($new_version) {
        // Update style.css
        $style_content = file_get_contents(self::STYLE_CSS_PATH);
        $style_content = preg_replace(
            '/Version:\s*[0-9]+\.[0-9]+\.[0-9]+/',
            "Version: {$new_version}",
            $style_content
        );
        file_put_contents(self::STYLE_CSS_PATH, $style_content);
        
        // Update functions.php wp_enqueue_style version
        $functions_content = file_get_contents(self::FUNCTIONS_PHP_PATH);
        $functions_content = preg_replace(
            "/wp_enqueue_style\('terpedia-style'[^,]+,[^,]+,\s*array\(\),\s*'[^']+'\)/",
            "wp_enqueue_style('terpedia-style', get_stylesheet_uri(), array(), '{$new_version}')",
            $functions_content
        );
        file_put_contents(self::FUNCTIONS_PHP_PATH, $functions_content);
        
        echo "Theme version updated to: {$new_version}\n";
    }
    
    public static function autoIncrementOnDeploy() {
        // Check if this is a deployment environment
        $is_deployment = getenv('GITHUB_ACTIONS') === 'true' || getenv('CI') === 'true';
        
        if ($is_deployment) {
            return self::incrementVersion('patch');
        }
        
        return self::getCurrentVersion();
    }
}

// CLI Usage for deployment scripts
if (php_sapi_name() === 'cli') {
    $action = $argv[1] ?? 'current';
    $type = $argv[2] ?? 'patch';
    
    switch ($action) {
        case 'current':
            echo TerpediaThemeVersionManager::getCurrentVersion() . "\n";
            break;
        case 'increment':
            echo TerpediaThemeVersionManager::incrementVersion($type) . "\n";
            break;
        case 'auto':
            echo TerpediaThemeVersionManager::autoIncrementOnDeploy() . "\n";
            break;
        default:
            echo "Usage: php version-manager.php [current|increment|auto] [major|minor|patch]\n";
    }
}
?>