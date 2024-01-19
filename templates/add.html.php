
<div class="card" style="width: 50rem;">
    <form action="" method="post">
        <div class="card-body">
            <h5 class="card-title">Card title</h5>
                    <textarea id="joketext" name="joke[joketext]" rows="3" cols="100" ><?=$list['joketext']?></textarea>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="form-group">
                    <label class="active" for="dateStandard" ></label>
                    <input type="date"  id="jokedata" name="joke[jokedata]" value="<?=$list['jokedata']?>">
                </div>
            </li>
            <li class="list-group-item">A second item</li>

            <li class="list-group-item">A third item</li>
        </ul>
        <div class="card-body">
            <input type="submit" value="Add" class="btn btn-primary">
            <a href="#" class="card-link">Another link</a>
        </div>
        <input type="hidden" name="joke[id]" value="<?=$list['id'];?>">
    </form>
</div>

<script>
    $(function(){
        $('#datepicker').datepicker();
    });
</script>