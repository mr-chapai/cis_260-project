@extends('layouts.applayout')

@section('title', 'Product Dashbord')

@section('content')

    <div class="bg-white pt-1">
        <!--Product list heading row start -->
        <div class="row g-0 text-end  bg-white text-whitec">
            {{-- Success message --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="col-6 col-md-4  text-start">
                <h3 class="ms-2">User List</h3>
            </div>
            <div class="col-sm-6 col-md-8 text-end">
                <span class=""> Total Users: {{ $users->count() ?? '0' }}</span>
                <a href="/index" name="" class="btn btn-primary">Customer view</a>
                <a href="{{ route('user.form') }}" class="btn btn-primary me-3">Add User</a>
            </div>
        </div>
        @php
            @endphp


        @if($users->isEmpty())
            <p>No User added yet.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead class="table-success">
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col"> ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">User</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{ $user->id }}</td>

                        <td>
                            <a  class="link-primary" href="{{ route('user.user', $user->id) }}"
                               style="text-decoration-line: none; color:black;">
                                {{ ucfirst($user->first_name) }} {{ucfirst($user->last_name) }}
                            </a>
                        </td>

                        <td>{{ $user->email }}</td>
                        <td>
                            {{ preg_replace('/(\d{3})(\d{3})(\d{4})/', '($1) $2-$3', $user->phone) }}
                        </td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td class="@if( $user->status == 'expired')text-danger
                        @elseif($user->status == 'active')text-success
                        @elseif($user->status == 'pending')text-warning
                        @endif">{{ ucfirst($user->status) }}
                        </td>

                        <td class="d-flex">
                            <a class="btn btn-primary ms-1" href="{{ route('user.user', $user->id) }}"
                               role="button"
                            title="View">&#128065;</a>
                            <a class="btn btn-success ms-1" href="{{ route('user.edit', $user->id) }}"
                               role="button"
                            title="Edite">&#9997;</a>
                            <!--Delete Button trigger modal -->
                            <button type="button" class="btn btn-danger ms-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" title="Delete">
                                &#9003;
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center bg-warning">
                                            <h5 class="modal-title text-center" id="exampleModalLabel">Delete
                                                Waring</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this USER?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Cancel
                                            </button>

                                            <form action="{{ route('user.delete', $user->id) }}" method="POST"
                                                  style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

        @endif
    </div>

@endsection
