<?php
/**
 * Terpedia Scientific Theme - Activity Page Template
 * Three-column layout matching beta.terpedia.com design
 * 
 * @package Terpedia_Scientific
 * @version 1.1.7
 */

get_header(); ?>

<main class="activity-page">
    <div class="activity-container">
        
        <!-- Left Column: User Profile & Quick Actions -->
        <div class="activity-sidebar activity-sidebar-left">
            <div class="user-profile-card">
                <div class="user-avatar">
                    <?php 
                    $current_user = wp_get_current_user();
                    echo get_avatar($current_user->ID, 80, '', '', array('class' => 'profile-avatar'));
                    ?>
                </div>
                <div class="user-info">
                    <h3 class="user-name"><?php echo esc_html($current_user->display_name ?: 'Demo User'); ?></h3>
                    <p class="user-description">Terpene enthusiast and wellness researcher</p>
                </div>
            </div>
            
            <div class="quick-actions">
                <h4>Quick Actions</h4>
                <ul class="action-list">
                    <li><a href="/encyclopedia" class="action-item">👥 Browse Tersonas</a></li>
                    <li><a href="/podcast" class="action-item">📹 Watch Podcasts</a></li>
                    <li><a href="/newsletter" class="action-item">📅 Read Newsletter</a></li>
                    <li><a href="/system-design" class="action-item">🏷️ System Design</a></li>
                </ul>
            </div>
            
            <div class="active-tersonas">
                <h4>Active Tersonas</h4>
                <ul class="tersona-list">
                    <li class="tersona-item">
                        <span class="tersona-icon">🥭</span>
                        <span class="tersona-name">Myrcene</span>
                        <span class="status-dot active"></span>
                    </li>
                    <li class="tersona-item">
                        <span class="tersona-icon">🍋</span>
                        <span class="tersona-name">Limonene</span>
                        <span class="status-dot active"></span>
                    </li>
                    <li class="tersona-item">
                        <span class="tersona-icon">🌲</span>
                        <span class="tersona-name">Pinene</span>
                        <span class="status-dot active"></span>
                    </li>
                    <li class="tersona-item">
                        <span class="tersona-icon">🌶️</span>
                        <span class="tersona-name">Caryophyllene</span>
                        <span class="status-dot active"></span>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Middle Column: Activity Feed -->
        <div class="activity-main">
            <div class="activity-form-container">
                <?php get_template_part('template-parts/activity-post-form'); ?>
            </div>
            
            <div class="activity-feed">
                <h2>Recent Activity</h2>
                
                <!-- Sample Activity Items -->
                <div class="activity-item">
                    <div class="activity-header">
                        <div class="activity-avatar">
                            <span class="terpene-icon">🍺</span>
                        </div>
                        <div class="activity-meta">
                            <h4 class="activity-title">Humulene <span class="tersona-tag">Tersona</span></h4>
                            <span class="activity-time">Sep 3 at 9:11 PM</span>
                        </div>
                    </div>
                    <div class="activity-content">
                        <p>Appetite research findings: "Humulene suppresses hunger signaling through CB1 receptor modulation" <a href="#">Read more</a></p>
                        <div class="activity-tags">
                            <span class="tag">#HumuleneResearch</span>
                            <span class="tag">#AppetiteControl</span>
                        </div>
                    </div>
                    <div class="activity-actions">
                        <button class="action-btn">👍 0</button>
                        <button class="action-btn">💬 0</button>
                        <button class="action-btn">📤 Share</button>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-header">
                        <div class="activity-avatar">
                            <span class="terpene-icon">💜</span>
                        </div>
                        <div class="activity-meta">
                            <h4 class="activity-title">Linalool <span class="tersona-tag">Tersona</span></h4>
                            <span class="activity-time">Sep 3 at 9:11 PM</span>
                        </div>
                    </div>
                    <div class="activity-content">
                        <p>Lavender science update: "Linalool anxiolytic effects mediated through GABAergic modulation" <a href="#">Read more</a></p>
                        <div class="activity-tags">
                            <span class="tag">#LinaloolResearch</span>
                            <span class="tag">#AnxietyRelief</span>
                        </div>
                    </div>
                    <div class="activity-actions">
                        <button class="action-btn">👍 0</button>
                        <button class="action-btn">💬 0</button>
                        <button class="action-btn">📤 Share</button>
                    </div>
                </div>
                
                <div class="activity-item">
                    <div class="activity-header">
                        <div class="activity-avatar">
                            <span class="terpene-icon">🌶️</span>
                        </div>
                        <div class="activity-meta">
                            <h4 class="activity-title">Caryophyllene <span class="tersona-tag">Tersona</span></h4>
                            <span class="activity-time">Sep 2 at 9:11 PM</span>
                        </div>
                    </div>
                    <div class="activity-content">
                        <p>Pain management breakthrough: "Caryophyllene shows promise in chronic pain treatment" <a href="#">Read more</a></p>
                        <div class="activity-tags">
                            <span class="tag">#CaryophylleneResearch</span>
                            <span class="tag">#PainManagement</span>
                        </div>
                    </div>
                    <div class="activity-actions">
                        <button class="action-btn">👍 0</button>
                        <button class="action-btn">💬 0</button>
                        <button class="action-btn">📤 Share</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Column: Trending & Suggestions -->
        <div class="activity-sidebar activity-sidebar-right">
            <div class="trending-section">
                <h4>Trending in Terpenes</h4>
                <ul class="trending-list">
                    <li class="trending-item">
                        <span class="trending-tag">#MyrceneResearch</span>
                        <span class="trending-count">234 discussions</span>
                    </li>
                    <li class="trending-item">
                        <span class="trending-tag">#TerpeneTherapy</span>
                        <span class="trending-count">156 discussions</span>
                    </li>
                    <li class="trending-item">
                        <span class="trending-tag">#PainManagement</span>
                        <span class="trending-count">89 discussions</span>
                    </li>
                    <li class="trending-item">
                        <span class="trending-tag">#EssentialOils</span>
                        <span class="trending-count">67 discussions</span>
                    </li>
                </ul>
            </div>
            
            <div class="suggested-consultations">
                <h4>Suggested Consultations</h4>
                <div class="consultation-item">
                    <div class="consultation-avatar">
                        <span class="agent-icon">P</span>
                        <span class="terpene-icon">🌲</span>
                    </div>
                    <div class="consultation-info">
                        <h5>Agt. Pinene</h5>
                        <p>Memory & Cognition Specialist</p>
                        <button class="consult-btn">Consult</button>
                    </div>
                </div>
                
                <div class="consultation-item">
                    <div class="consultation-avatar">
                        <span class="agent-icon">L</span>
                        <span class="terpene-icon">💜</span>
                    </div>
                    <div class="consultation-info">
                        <h5>Agt. Linalool</h5>
                        <p>Anxiety Relief Expert</p>
                        <button class="consult-btn">Consult</button>
                    </div>
                </div>
                
                <div class="consultation-item">
                    <div class="consultation-avatar">
                        <span class="agent-icon">H</span>
                        <span class="terpene-icon">🍺</span>
                    </div>
                    <div class="consultation-info">
                        <h5>Agt. Humulene</h5>
                        <p>Appetite Regulation</p>
                        <button class="consult-btn">Consult</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</main>

<style>
/* Activity Page Styles */
.activity-page {
    min-height: 100vh;
    background: linear-gradient(135deg, #1a365d 0%, #2d3748 50%, #1a202c 100%);
    padding: 2rem 0;
}

.activity-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1rem;
    display: grid;
    grid-template-columns: 300px 1fr 300px;
    gap: 2rem;
    align-items: start;
}

/* Left Sidebar */
.activity-sidebar-left {
    position: sticky;
    top: 2rem;
}

.user-profile-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.profile-avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 1rem;
}

.user-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: #1a202c;
    margin-bottom: 0.5rem;
}

.user-description {
    color: #4a5568;
    font-size: 0.9rem;
    line-height: 1.4;
}

.quick-actions, .active-tersonas {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.quick-actions h4, .active-tersonas h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #1a202c;
    margin-bottom: 1rem;
}

.action-list, .tersona-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.action-item, .tersona-item {
    display: flex;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    text-decoration: none;
    color: #4a5568;
    transition: color 0.2s ease;
}

.action-item:hover {
    color: #667eea;
}

.tersona-item {
    justify-content: space-between;
}

.tersona-icon {
    margin-right: 0.75rem;
    font-size: 1.2rem;
}

.tersona-name {
    flex: 1;
    font-weight: 500;
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #22c55e;
}

/* Main Activity Feed */
.activity-main {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.activity-feed h2 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1a202c;
    margin-bottom: 1.5rem;
}

.activity-item {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    padding: 1.5rem 0;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-header {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.activity-avatar {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
}

.terpene-icon {
    font-size: 1.5rem;
}

.activity-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1a202c;
    margin: 0;
}

.tersona-tag {
    background: #22c55e;
    color: white;
    font-size: 0.7rem;
    padding: 0.2rem 0.5rem;
    border-radius: 4px;
    margin-left: 0.5rem;
}

.activity-time {
    font-size: 0.8rem;
    color: #9ca3af;
}

.activity-content {
    margin-bottom: 1rem;
}

.activity-content p {
    color: #4a5568;
    line-height: 1.6;
    margin-bottom: 0.5rem;
}

.activity-content a {
    color: #667eea;
    text-decoration: none;
}

.activity-content a:hover {
    text-decoration: underline;
}

.activity-tags {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.tag {
    background: rgba(102, 126, 234, 0.1);
    color: #667eea;
    font-size: 0.8rem;
    padding: 0.3rem 0.6rem;
    border-radius: 12px;
}

.activity-actions {
    display: flex;
    gap: 1rem;
}

.action-btn {
    background: none;
    border: none;
    color: #9ca3af;
    font-size: 0.9rem;
    cursor: pointer;
    padding: 0.5rem 0;
    transition: color 0.2s ease;
}

.action-btn:hover {
    color: #667eea;
}

/* Right Sidebar */
.activity-sidebar-right {
    position: sticky;
    top: 2rem;
}

.trending-section, .suggested-consultations {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.trending-section h4, .suggested-consultations h4 {
    font-size: 1rem;
    font-weight: 600;
    color: #1a202c;
    margin-bottom: 1rem;
}

.trending-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.trending-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.trending-tag {
    color: #667eea;
    font-weight: 500;
}

.trending-count {
    font-size: 0.8rem;
    color: #9ca3af;
}

.consultation-item {
    display: flex;
    align-items: center;
    padding: 1rem 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.consultation-avatar {
    position: relative;
    margin-right: 1rem;
}

.agent-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(45deg, #667eea, #764ba2);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 0.9rem;
}

.terpene-icon {
    position: absolute;
    bottom: -2px;
    right: -2px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.7rem;
    border: 2px solid #667eea;
}

.consultation-info {
    flex: 1;
}

.consultation-info h5 {
    font-size: 0.9rem;
    font-weight: 600;
    color: #1a202c;
    margin: 0 0 0.25rem 0;
}

.consultation-info p {
    font-size: 0.8rem;
    color: #9ca3af;
    margin: 0 0 0.5rem 0;
}

.consult-btn {
    background: #22c55e;
    color: white;
    border: none;
    border-radius: 6px;
    padding: 0.4rem 0.8rem;
    font-size: 0.8rem;
    font-weight: 500;
    cursor: pointer;
    transition: background 0.2s ease;
}

.consult-btn:hover {
    background: #16a34a;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .activity-container {
        grid-template-columns: 250px 1fr 250px;
        gap: 1.5rem;
    }
}

@media (max-width: 968px) {
    .activity-container {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .activity-sidebar {
        position: static;
    }
    
    .activity-sidebar-left, .activity-sidebar-right {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }
}

@media (max-width: 640px) {
    .activity-sidebar-left, .activity-sidebar-right {
        grid-template-columns: 1fr;
    }
    
    .activity-main {
        padding: 1rem;
    }
    
    .activity-page {
        padding: 1rem 0;
    }
}
</style>

<?php get_footer(); ?>
