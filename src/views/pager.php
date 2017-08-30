<nav aria-label="Page navigation">
    <ul class="pagination">
        <?php if (!$pager->isPreviousActive()): ?>
            <li class="disabled">
                <span aria-hidden="true">&laquo;</span>
            </li>
        <?php else: ?>
            <li>
                <a href="/tasks?page=<?= $pager->getPreviousPage() ?>"
                   aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif ?>

        <?php for ($i = $pager->getFirstPage(); $i <= $pager->getTotalPages(); $i++): ?>
            <?php if ($pager->getCurrentPage() == $i): ?>
                <li class="active">
                    <span><?= $i ?></span>
                </li>
            <?php else: ?>
                <li><a href="/tasks?page=<?= $i ?>"><?= $i ?></a></li>
            <?php endif ?>
        <?php endfor ?>

        <?php if (!$pager->isNextActive()): ?>
            <li class="disabled">
                <span aria-hidden="true">&raquo;</span>
            </li>
        <?php else: ?>
            <li>
                <a href="/tasks?page=<?= $pager->getNextPage() ?>"
                   aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif ?>

    </ul>
</nav>
