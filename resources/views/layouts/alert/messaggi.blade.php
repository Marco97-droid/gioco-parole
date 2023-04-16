@if(session()->has('success'))
    <script>

            iziToast.success({
              title: 'Operazione Riuscita',
              message: '{{ session()->get('success') }}',
              position: 'bottomRight'
            });
    </script>
    <div class="iziToast-wrapper iziToast-wrapper-bottomRight"> </div>
@endif

@if(session()->has('warning'))
    <script>

            iziToast.warning({
              title: 'Attenzione!',
              message: '{{ session()->get('warning') }}',
              position: 'bottomRight'
            });
    </script>
    <div class="iziToast-wrapper iziToast-wrapper-bottomRight"> </div>
@endif

@if(session()->has('info'))
    <script>

            iziToast.info({
              title: 'Messaggio!',
              message: '{{ session()->get('info') }}',
              position: 'bottomRight'
            });
    </script>
    <div class="iziToast-wrapper iziToast-wrapper-bottomRight"> </div>
@endif

@if(!$errors->isEmpty())
    <script>

            iziToast.error({
              title: 'Operazione Fallita',
              message: 'Ricontrolla i campi inseriti.',
              position: 'bottomRight'
            });
            
    </script>
    <div class="iziToast-wrapper iziToast-wrapper-bottomRight"> </div>
@endif
