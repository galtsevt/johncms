@extends('system::layout/default')
@section('content')

    @if($users->total() > 0)
        @foreach ($users as $user)
            @include('johncms/community::public/user', ['user' => $user])
        @endforeach
    @else
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-info"><?= __('List is empty') ?></div>
            </div>
        </div>
    @endif

    @if($users->total() > 0)
        <div class="mt-2">
            <div>{{ __('Total') }}: {{ $users->total() }}</div>
            <!-- Page switching -->
            <div class="mt-1">{{ $users->render() }}</div>
        </div>
    @endif

    <div class="btn-group btn-group-sm mt-2">
        <a class="btn btn-primary btn-sm" href="{{ route('community.search') }}"><?= __('User Search') ?></a>
        <a class="btn btn-secondary btn-sm" href="{{ route('community.index') }}"><?= __('Back') ?></a>
    </div>
@endsection
