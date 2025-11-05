@extends('layouts.employer')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition">
            <h2 class="text-gray-500 text-sm font-medium">Total Jobs</h2>
            <p class="text-3xl font-semibold text-indigo-600 mt-1">{{ $totalJobs ?? 0 }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition">
            <h2 class="text-gray-500 text-sm font-medium">Applications</h2>
            <p class="text-3xl font-semibold text-indigo-600 mt-1">{{ $applications ?? 0 }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow hover:shadow-md transition">
            <h2 class="text-gray-500 text-sm font-medium">Pending Approvals</h2>
            <p class="text-3xl font-semibold text-indigo-600 mt-1">{{ $pending ?? 0 }}</p>
        </div>
    </div>

    <div class="mt-8 bg-white p-6 rounded-xl shadow">
        <h2 class="text-lg font-semibold mb-4 text-gray-700">Recent Job Posts</h2>
        <table class="w-full text-left border-collapse">
            <thead>
            <tr class="bg-indigo-50">
                <th class="p-3 text-sm text-gray-600 font-semibold">Title</th>
                <th class="p-3 text-sm text-gray-600 font-semibold">Experience</th>
                <th class="p-3 text-sm text-gray-600 font-semibold">Salary</th>
                <th class="p-3 text-sm text-gray-600 font-semibold">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($jobs as $job)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">{{ $job->title }}</td>
                    <td class="p-3">{{ $job->experience }}</td>
                    <td class="p-3">{{ $job->salary }}</td>
                    <td class="p-3 space-x-2">
                        <a href="{{ route('employer.jobs.edit', $job->id) }}" class="text-indigo-600 hover:underline">Edit</a>
                        <form action="{{ route('employer.jobs.destroy', $job->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">No jobs posted yet.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
