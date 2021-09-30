<?php
/*
 * Plugin Name: Vercel Deployment
 * Description: Triggers a new deployment on Vercel using the relevant specified hook URL.
 * Version: 1.0
 * Plugin URI:  https://noeticblue.com
 * Author:      NoeticBlue
 * Plugin URI:  https://noeticblue.com
 */

function nb_trigger_webhook($id, $post)
{
  // We don't want these kinds of posts to trigger builds.
  $invalid_statuses = ['draft', 'future', 'pending', 'private', 'auto-draft'];
  if (isset($post) && in_array($post->post_status, $invalid_statuses)) {
    return;
  }

  $url = getenv('VERCEL_WEBHOOK_URL');
  if (!isset($url)) {
    return;
  }

  return wp_remote_post($url);
}

add_action('publish_future_post', 'nb_trigger_webhook', 10, 2);
add_action('publish_post', 'nb_trigger_webhook', 10, 2);
add_action('untrash_post', 'nb_trigger_webhook', 10, 2);
add_action('publish_page', 'nb_trigger_webhook', 10, 2);
add_action('post_updated', 'nb_trigger_webhook', 10, 2);
add_action('trash_post', 'nb_trigger_webhook', 10, 2);
add_action('trash_page', 'nb_trigger_webhook', 10, 2);
add_action('edited_category', 'nb_trigger_webhook', 10, 2);
add_action('edited_post_tag', 'nb_trigger_webhook', 10, 2);
