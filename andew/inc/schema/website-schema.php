<?php if (is_front_page()): ?>
    <script type='application/ld+json'> {
        "@context": "https:\/\/schema.org",
        "@type": "WebSite",
        "@id": "#website",
        "url": "<?php echo get_site_url(); ?>",
        "name": "<?php echo bloginfo('name'); ?>",
        "potentialAction": {
        "@type": "SearchAction",
        "target": "<?php echo get_site_url(); ?>?s={search_term_string}",
        "query-input": "required name=search_term_string"
        }
        } 
    </script>
<?php endif; ?>