<?php
/**
 * Title: Latest Posts
 * Slug: pinked/lastest-posts
 * Categories: query
 * Block Types: core/query
 * Description: A list of posts showing the latest entries with featured image and metadata.
 */
?>

<!-- wp:query {"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query">
    <!-- wp:post-template {"layout":{"type":"default"}} -->
        <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)">
            <!-- wp:post-featured-image {"isLink":true,"align":"wide","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} /-->

            <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
            <div class="wp-block-group">
                <!-- wp:post-date /-->
                <!-- wp:post-terms {"term":"category"} /-->
            </div>
            <!-- /wp:group -->
            <!-- wp:post-title {"isLink":true,"fontSize":"x-large"} /-->

            <pk-card data='<!-- wp:pinked/jcf-post-info /-->'></pk-card>

            <!-- wp:post-excerpt {"moreText":"Read more"} /-->
        </div>
        <!-- /wp:group -->
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->
        <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->