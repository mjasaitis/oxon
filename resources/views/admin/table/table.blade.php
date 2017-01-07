
@if( isset($table['cells'] ) && isset($tableData) && count($tableData) )

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      @foreach( $table['cells'] as $item )
      <th>
      	@if( isset($item['title']) ){{ $item['title'] }}@else &nbsp; @endif
      </th>
      @endforeach
    </tr>
  </thead>

  <tbody>
  	@foreach( $tableData as $data )
    <tr>
      <th scope="row">{{ $data->id }}</th>
      @foreach( $table['cells'] as $cell )
      <td>
      @if( !isset( $cell['type'] ) || isset( $cell['type'] ) && $cell['type'] == 'text' )
      	@include( 'admin.table.cells.text' )
      @else
      	@include( 'admin.table.cells.' . $cell['type']  )
      @endif
      </td>

      @endforeach
    </tr>
    @endforeach
  </tbody>
</table>

<script type="text/javascript" >

  function deleteConfirm(id){
    if( confirm( "Delete?") ){
      $.ajax({
        type: "DELETE",
        dataType: "json",
        url: '{{ $pageUrl }}/' + id + '?_token=' + window.Laravel.csrfToken,
        success: function(data) {
          if( data.deleted ){
            document.location = '{{ $pageUrl }}'
          }
        }
      });


    }
  }

</script>

@endif