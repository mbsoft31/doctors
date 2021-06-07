<x-app-layout>

    <div class="max-w-5xl mx-auto py-12">
        <form action="{{ route("appointment.store") }}" method="POST">
            @csrf
            <x-appointment.form :doctor="$doctor ?? null"/>
            <input type="submit" value="Save">
        </form>
    </div>

</x-app-layout>
