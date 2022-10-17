<?php $counter = 0; ?>
<div class="container">
    <h1 class="text-center">Quiz</h1>
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
</div>