<!-- Modal -->
<form id="declineOngform" method="get" action="{{ route('delUsuarioInvitation', $showVol->id) }}">
      <input type="hidden" name="token" value="{{csrf_token()}}">
       <div class="modal fade" id="declineOng{{$showVol->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">Você tem certeza que deseja recusar o pedido desta Ong ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Sim, recusar</button>
            </div>
            </div>
        </div>
    </div>
</form>