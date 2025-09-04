<?php
/**
 * Custom Activity Post Form Template
 * Matches the React beta design
 */
?>

<div class="terpedia-activity-form">
    <form id="whats-new-form" method="post" action="<?php bp_activity_post_form_action(); ?>">
        <div class="activity-form-header">
            <div class="activity-avatar">
                <?php bp_loggedin_user_avatar('type=thumb&width=48&height=48'); ?>
            </div>
            <div class="activity-form-content">
                <textarea 
                    id="whats-new-textarea" 
                    name="whats-new" 
                    placeholder="What's on your mind?"
                    rows="1"
                ></textarea>
            </div>
        </div>
        
        <div class="activity-post-form-options">
            <span class="post-option" title="Add media" data-option="media">📹</span>
            <span class="post-option" title="Add image" data-option="image">📷</span>
            <span class="post-option" title="Add document" data-option="document">📄</span>
            <span class="post-option" title="Add emoji" data-option="emoji">😊</span>
        </div>
        
        <div class="activity-form-footer">
            <div class="activity-form-actions">
                <input type="submit" id="whats-new-submit" name="aw-whats-new-submit" value="Post" />
            </div>
        </div>
        
        <?php wp_nonce_field('post_update', '_wpnonce_post_update'); ?>
        <input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
        <input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="0" />
    </form>
</div>

<style>
.terpedia-activity-form {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.activity-form-header {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 12px;
}

.activity-form-header .activity-avatar img {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    border: 2px solid rgba(255, 255, 255, 0.5);
}

.activity-form-content {
    flex: 1;
}

#whats-new-textarea {
    width: 100%;
    border: none;
    background: transparent;
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    padding: 12px 0;
    resize: none;
    outline: none;
    color: #1a202c;
    min-height: 20px;
}

#whats-new-textarea::placeholder {
    color: #9ca3af;
}

.activity-form-footer {
    display: flex;
    justify-content: flex-end;
    margin-top: 12px;
}

#whats-new-submit {
    background: #a78bfa;
    color: white;
    border: none;
    border-radius: 12px;
    padding: 12px 24px;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.2s ease;
}

#whats-new-submit:hover {
    background: #8b5cf6;
    transform: translateY(-1px);
}
</style>