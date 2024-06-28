
@extends('layouts.app')

@section('content')


        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">user_id</th>
                    <th scope="col">message</th>
                    <th scope="col">action</th>
              
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    @csrf
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $contact->user_id }}</td>
                    <td>{{ $contact->message}}</td>
                    <td><a href="{{ route('send-mail-form' , $contact->user_id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i>Reply</a></td>
                </tr>
                
                @endforeach
            </tbody>
        </table>

    

    </div>
</div>

@endsection

