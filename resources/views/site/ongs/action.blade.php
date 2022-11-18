<!-- Modal -->
<form id="acceptVolform" method="get" action="{{ route('confirm', $show->id) }}">
      <input type="hidden" name="token" value="{{csrf_token()}}">
       <div class="modal fade" id="confirmVol{{$show->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Você tem certeza que deseja aceitar o pedido deste voluntário ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Sim, aceitar</button>
            </div>
            </div>
        </div>
    </div>
</form>