
@extends('layouts.app')

@section('content')


        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">S#</th>
                    <th scope="col">user_id</th>
                    <th scope="col">service_id</th>
                    <th scope="col">describtion</th>
                    <th scope="col">status</th>
                    <th scope="col">handle</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    @csrf
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->service_id}}</td>
                    <td>{{ $order->describtion}}</td>
                    <td>
                        @switch($order->status)
                        @case(0)
                        pending
                        @break
                        @case(1)
                        completed
                        @break
                        @endswitch
                    </td>
                   
                    <td>
                        <form action="" method="POST" class="d-inline">

                        @if($order->status == 0)
                            <a href="{{ url('order/' . $order->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i>Complete</a>
                        @endif
                            
                   
                        </form>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>

    

    </div>
</div>

@endsection

