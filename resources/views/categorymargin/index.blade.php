@extends('template')
@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h2 class="display-4">Category Margins Details</h2>
            <table class="table">

                <thead>
                    <tr>

         
                        <th>Category</th>
                        <th>Role</th>
                        <th>Margin</th>
                        
                      
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach($catmargins as $catmargin)
                        <tr>
                            <ul>
                            <td>{{$catmargin->category->name}}</td>
                           <td>{{$catmargin->role->name}}</td>
                           <td>{{$catmargin->marginp}}</td>
                         
                     
                       
                            <td>

                                    <form action="" method="POST">
                            
                                
                                    <a class="btn btn-primary" href="{{route('categorymargin.edit',$catmargins->id)}}">edit</a> 
                                            <a class="btn btn-primary" href="{{route('categorymargin.show',$catmargins->id)}}">show</a> 
                                        </form>

                                    </ul>
                                    @endforeach
                                </td>


                        </tr>
                    </tbody>
                </table><!--end table-->
        </div><!--end colom-->
    </div><!--end row-->
</div><!--end container-->









@endsection