
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">TEXT</th>
        <th scope="col">data</th>
        <th scope="col">DELETE</th>
        <th scope="col">UPDATE</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1; foreach($tJoke as $tJok): ?>
        <tr>
            <th scope="row" style="width: 5%;"><?=htmlspecialchars($i, ENT_QUOTES, 'UTF-8')?></th>
            <td>  <div class="accordion accordion-flush" id="accordionFlushExample" style=" width: 85%; ">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$i?>" aria-expanded="false" aria-controls="flush-collapse<?=$i?>">
                                <?=$tJok['name']?>
                            </button>
                        </h2>
                        <div id="flush-collapse<?=$i?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body"><?=$tJok['joketext']?><br><b><?=$tJok['email']?></b></div>
                        </div>
                    </div>

                </div>
            </td>
            <td style="width: 20%;"><?=$tJok['jokedata']?></td>
            <td>
                <form action="/jo/delete" method="post">
                    <input type="hidden" name="idD" value="<?=$tJok['id']?>">
                    <button type="submit"  class="btn btn-outline-warning">Warning</button>
                </form>
            </td>
            <td>
                <form action="/jo/edit" method="post" >
                    <input type="hidden" name="id" value="<?=$tJok['id']?>">
                    <button type="submit"  class="btn btn-outline-warning">update</button>
                </form>
            </td>
        </tr>

    <?php   $i++; endforeach; ?>

    </tbody>
</table>





