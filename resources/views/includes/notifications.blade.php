{{-- @php
    $notifications = collect(auth()->user()->unreadNotifications)->sortByDesc('created_at');
    $notEmpty = $notifications->isNotEmpty();
@endphp

<li class="dropdown dropdown-list-toggle">
    <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg @if ($notEmpty) beep @endif"><i class="far fa-bell"></i></a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">
            @lang('Notifications')  
            <sup class="badge badge-warning"><strong>{{ $notifications->count() }}</strong></sup>
            <div class="float-right">
                @if ($notEmpty) 
                    <a href="{{ route('notifications.mark-all-as-read') }}" onclick="event.preventDefault(); 
                        document.getElementById('mark-all-as-read').submit();">@lang('Mark All As Read')</a> 
                @endif
                <form id="mark-all-as-read" action="{{ route('notifications.mark-all-as-read') }}" method="POST" class="d-none">
                    @csrf
                    @method('PATCH')
                </form>
            </div>
        </div>
        
        <div class="dropdown-list-content dropdown-list-icons">
            @forelse ($notifications as $notification)
                @php
                    $productType = $notification->type === 'App\Notifications\ProductCreatedNotification';
                    $contactType = $notification->type === 'App\Notifications\ContactNotification';
                    $quoteType = $notification->type === 'App\Notifications\QuoteNotification';
                @endphp

                @if($productType)
                    @php $product = App\Models\Product::findOrFail($notification->data['product']) @endphp
                @elseif($contactType)
                    @php $contact = App\Models\Contact::findOrFail($notification->data['contact']['id']); @endphp
                @elseif($quoteType)
                    @php $quote = App\Models\Quote::findOrFail($notification->data['quote']['id']); @endphp
                @endif

                <a href="{{ route('notifications.mark-as-read', $notification->id) }}" class="dropdown-item dropdown-item-unread"
                    onclick="event.preventDefault(); document.getElementById('{{ $notification->id }}').submit();">
                    <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-code"></i>
                    </div>

                    @if ($productType)
                        <div class="dropdown-item-desc">
                            {{ $product->name }}
                            <div class="time text-primary">
                                {{ $product->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @elseif ($contactType)
                        <div class="dropdown-item-desc">
                            @lang('New message from :') {{ $contact->name }}
                            <div class="time text-primary">
                                {{ $contact->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @elseif ($quoteType)
                        <div class="dropdown-item-desc">
                            @lang('New quote from :') {{ $quote->name }}
                            <div class="time text-primary">
                                {{ $quote->created_at->diffForHumans() }}
                            </div>
                        </div>
                    @endif
                </a>
                <form id="{{ $notification->id }}" action="{{ route('notifications.mark-as-read', $notification->id) }}" method="POST" class="d-none">
                    @csrf
                    @method('PATCH')
                </form>
            @empty
                <a href="#" class="dropdown-item dropdown-item-unread text-center">@lang('No notification')</a>
            @endforelse
        </div>
    </div>
</li> --}}