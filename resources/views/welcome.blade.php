@extends('layouts.app')

@section('content')
<div class="py-20 flex flex-col justify-center">
    @empty($users)
    <h1 class="text-4xl font-bold mb-7">No Users</h1>     
    @else
        <h1 class="text-4xl font-bold mb-7">Usuarios registrados</h1>     
        <table class="table-auto border-2 border-gray-800 text-left">
            <thead class="bg-gray-800">
              <tr class="text-white">
                <th class="py-4 px-2">User name</th>
                <th class="py-4 px-2">View profile</th>
                <th class="py-4 px-2">#Post</th>

              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="p-5">
                    {{$user->name}}
                </td>

                <td class="p-5">
                    <a href="{{ route('user.show', ['user' => $user->id]) }}"> View </a>                      
                </td>

                <td class="p-5">
                    <span> {{count($user->posts)}} </span>                      
                </td>
            </tr>
              @endforeach 
            </tbody>
        </table>
    @endempty
</div>

@endsection