@extends('muster')
  
@section('content2')
<div class="row mt-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.show') }}"> Back</a>
        </div>
    </div>
</div>
     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="{{ route('products.insert') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" name="price" class="form-control" placeholder="price">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Thambnail:</strong>
                <input type="file" name="thumbnail" class="form-control" placeholder="thumbnail" onchange="validateImage(event);">
                 <img  id="output"  style="height:100px; width:100px;" >

            </div>
        </div>

         

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
<script type="text/javascript">


    function validateImage(event){

        var output=document.getElementById('output');
        output.src=URL.createObjectURL(event.target.files[0]);
    }











    // function previewFile(input){
    //     var file=$("input[type=file]").get(0).files[0];
    //     if (file) {
    //         var reader=new FileReader();
    //         reader.onload=function(){
    //             $(#imageview).attr("src",reader.result);
    //         }
    //         reader.readAsDataURL(file);
    //     }
    // }
    

</script>
@endsection