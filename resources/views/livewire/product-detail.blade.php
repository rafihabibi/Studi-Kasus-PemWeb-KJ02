<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('home') }}" class="text-dark">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('products') }}" class="text-dark">List Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                </ol>
              </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>

    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src="{{ asset('storage/assets/') }}/{{ $product->gambar }}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col">
                    <h2><strong>{{ $product->nama }}</strong>
                    </h2>
                </div>
            </div>
                    <h4>Rp. {{ number_format($product->harga) }}
                    @if($product->is_ready == 1)
                        <span class="badge badge-success"> <i class="fas fa-check"></i> Ready Stok</span>
                    @else
                        <span class="badge badge-danger"> <i class="fas fa-times"></i> Stok Habis</span>
                    @endif
                    </h4>
                  <hr>
                  <div class="row">
                      <div class="col">
                          <form wire:submit.prevent="masukkanKeranjang">
                      <table class="table" style="border-top :hidden">
                          <tr>
                              <td>Berat</td>
                              <td>:</td>
                              <td>{{ $product->berat }}</td>
                          </tr>
                        <tr>
                            <td>Jumlah Pesanan</td>
                            <td>:</td>
                            <td>
                                <input id="jumlah_pesanan" type="number" class="form-control @error('jumlah_pesanan') is-invalid @enderror" wire:model="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required autocomplete="name" autofocus>
                                @error('jumlah_pesanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </td>
                            <tr>
                                <td>Deskripsi Produk</td>
                                <td>:</td>
                                <td>{{ $product->deskripsi_produk }}</td>
                                
                             </td>
                             
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn btn-dark btn-block" @if($product->is_ready !== 1) disabled @endif><i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
                            </td>
                        </tr>
                      </table>
                    </form>
                    </div>
                  </div>
        </div>
    </div>
</div>
