@if(Session::has('addcart'))
<!-- Modal Core-->
<div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                <h4 id="myModalLabel" class="modal-title">Поздравляем!</h4>
            </div>
            <div class="modal-body">Товар добавлен в корзину. Для просмотра корзины пройдите по <a href="{{ route('product.basket') }}">ссылке</a>.</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default btn-simple">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#myModal').on('show.bs.modal', function () {
        setTimeout(function(){
            $('#myModal').modal('hide');
        }, 3000);
    });
    $('#myModal').modal('show');
</script>
@endif
<!-- End Modal Core-->