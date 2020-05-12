<nav aria-label="page navigation example">
    <ul class="pagination justify-content-end">
        <li class="page-item">
            <?php if ($first_page !== FALSE): ?>
                <a class="page-link" aria-label="First" href="<?php echo HTML::chars($page->url($first_page)) ?>" rel="first"><?php echo __('|<') ?></a>
            <?php else: ?>
                <a class="page-link" aria-label="First" href="" rel="first"><b><?php echo __('|<') ?></b></a>
            <?php endif ?>
        </li>
        <li class="page-item">
            <?php if ($previous_page !== FALSE): ?>
                <a class="page-link" aria-label="Previous" href="<?php echo HTML::chars($page->url($previous_page)) ?>" rel="prev">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Anterior</span>
                </a>
            <?php else: ?>
                <a class="page-link" aria-label="Previous" href="" rel="prev">
                    <span aria-hidden="true"><b>&laquo;</b></span>
                    <span class="sr-only"><b>Anterior</b></span>
                </a>
            <?php endif ?>
        </li>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item">
                <?php if ($i == $current_page): ?>
                    <a class="page-link" href=""><b><?php echo $i ?></b></a>
                <?php else: ?>
                    <a class="page-link" href="<?php echo HTML::chars($page->url($i)) ?>"><?php echo $i ?></a>
                <?php endif ?>
            </li>
        <?php endfor ?>
        <li class="page-item">
            <?php if ($next_page !== FALSE): ?>
                <a class="page-link" aria-label="Next" href="<?php echo HTML::chars($page->url($next_page)) ?>" rel="next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Próximo</span>
                </a>
            <?php else: ?>
                <a class="page-link" aria-label="Next" href="" rel="next">
                    <span aria-hidden="true"><b>&raquo;</b></span>
                    <span class="sr-only"><b>Próximo</b></span>
                </a>
            <?php endif ?>
        </li>
        <li class="page-item">
            <?php if ($last_page !== FALSE): ?>
                <a class="page-link" href="<?php echo HTML::chars($page->url($last_page)) ?>" rel="last"><?php echo __('>|') ?></a>
            <?php else: ?>
                <a class="page-link" href="" rel="last"><b><?php echo __('>|') ?></b></a>
                    <?php endif ?>
        </li>
    </ul>
</nav>
<!-- .pagination -->