<div>
    <a style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal" wire:click.prevent="openModal({{ $item->id_barang }})">
        <svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="red">
             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
   </a>
   
   <!-- Modal -->
   <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
             <div class="modal-content">
                  <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Delete Modal</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                       </button>
                  </div>
                  <div class="modal-body">
                       <h5>
                            Apakah anda yakin ingin menghapus barang ini
                       </h5>
                       <ul class="mt-3">
                            <li>Nama Barang : {{ $item_detail }}</li>
                            <li>Stok : </li>
                            <li>Satuan : </li>
                       </ul>
                  </div>
                  <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                       <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
             </div>
        </div>
   </div>
</div>