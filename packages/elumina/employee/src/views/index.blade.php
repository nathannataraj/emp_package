@extends('elumina.employee.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h3>List of Employees</h3>
            @include('elumina.employee.error-message')
            <div class="col=-sm-12 text-right"><a href="{{route('employee.create')}}">Add new employee</a></div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Profile</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>    
                </thead> 
                <tbody>
                    @if(count($employees) > 0)
                            @foreach($employees as $emp)
                                <tr>
                                    <td>{{$emp->fullName}}</td>
                                    <td>{{$emp->email}}</td>
                                    <td>{{$emp->profile}}</td>
                                    <td>{{$emp->address}}</td>
                                    <td>{{$emp->status}}</td>
                                    <td><a href="{{route('employee.edit',$emp->id)}}"><button class="btn btn-info">Edit</button></a></td>
                                    <td>
                                        <form method="POST" action="{{route('employee.destroy',$emp->id)}}" onsubmit="return confirm('Are you sure? Do you want to continue?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-info">Delete</button>
                                        </form>
                                    </td>     
                                </tr>    
                            @endforeach
                    @else
                            <tr>
                                <td colspan="7"><h4 class="text-center">No records!!!</h4></td>  
                            </tr>
                    @endif 
                </tbody>       
            </table>
        </div>   
    </div>
@endsection