@extends('layouts.public')

@section('content')
  <div class="max-w-2xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">Contact Us</h1>
    <p class="text-gray-600 mb-6">Have questions? Reach out to us below.</p>

    <form action="#" method="POST" class="space-y-4 bg-white shadow rounded-lg p-6">
      <div>
        <label class="block text-sm font-medium text-gray-700">Your Name</label>
        <input type="text" name="name" required 
               class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" required 
               class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Message</label>
        <textarea name="message" rows="4" required 
                  class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
      </div>

      <button type="submit"
              class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
        Send Message
      </button>
    </form>
  </div>
@endsection
