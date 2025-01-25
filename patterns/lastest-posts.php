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
            <pk-card data='<!-- wp:pinked/jcf-post-info /-->'></pk-card>
    <!-- /wp:post-template -->

    <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
        <!-- wp:query-pagination-previous /-->
        <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
</div>
<!-- /wp:query -->