<?php $counter = 0; ?>
<h1>Domande</h1>
<table>
    <form action="" method="post">
        <?php for ($i = 0; $i < 5; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 10; $j++): ?>
                    <td>
                        <button>
                            <?php echo $counter; ?>
                        </button>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </form>
</table>
