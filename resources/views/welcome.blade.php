<x-layouts.layout>
    <div class="mx-auto lg:w-2/3">

        @can('isAdmin')
            <p>You're an admin</p>
        @elsecan('isMember')
            <p>you're a member</p>
        @else
            <p>You're a user</p>
        @endcan
    </div>
</x-layouts.layout>
