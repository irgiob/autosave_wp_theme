<?php $page_num = ($paged > 1) ? $paged : 1 ?>
<?php if ($wp_query->max_num_pages > 1): ?>
    <ul class="pagination justify-content-center">
        <li class="page-item <?php if ($page_num <= 1) echo "disabled"; ?>">
            <a class="page-link" href="<?php echo get_pagenum_link($page_num - 1) ?>" aria-label="Previous">
                <i class="bi-chevron-left"></i>
            </a>
        </li>
        <?php for($i=1;$i<=$wp_query->max_num_pages;$i++): ?>
            <li class="page-item <?php if ($i == $page_num) echo "active"; ?>">
                <a class="page-link" href="<?php echo get_pagenum_link($i)?>"><?php echo $i ?></a>
            </li>
        <?php endfor; ?>
        <li class="page-item <?php if ($page_num >= $wp_query->max_num_pages) echo "disabled"; ?>">
            <a class="page-link" href="<?php echo get_pagenum_link($page_num + 1) ?>" aria-label="Next">
                <i class="bi-chevron-right"></i>
            </a>
        </li>
    </ul>
<?php endif; ?>