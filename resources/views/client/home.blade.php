@extends('client.layouts.layout_master')
@section('main')
<section class="flex lg:flex-row w-full h-screen">
    <div class="w-3/12 h-auto hidden lg:block bg-white overflow-auto shadow-lg">
        <ul class="pt-2 pb-5 px-3">
            @Auth
            <li>
                <card-list :user="{{auth()->user()}}"></card-list>
            </li>
            @endif
        </ul>
    </div>
    <div id="messages" class="grow bg-gray-200 relative">
        @Auth
        <chat-message :user="{{auth()->user()}}" :messages="this.messages"></chat-message>
        <chat-form :user="{{auth()->user()}}" @messagesent="addMessage"></chat-form>
    </div>
    @endif
    </div>
</section>
@endsection