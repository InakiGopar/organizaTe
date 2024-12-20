
<div class="orders-container"
>
    <div class="btn-order-container">

        <button class="app-button">
            <a href="{{route('order.create')}}">Quiero Hacer Un Pedido</a>
        </button>
    
        <button 
            class="app-button"
            wire:click="$set('filter', '')"
            style="display: {{$filter == '' ? 'none' : 'block'}}"
        >
            Ver Todos Los Pedidos
        </button>

        <button 
            class="app-button"
            wire:click="$set('filter', 'mis-pedidos')"
            style="display: {{$filter === 'mis-pedidos' ? 'none' : 'block'}}"
        >
            Ver Mis Pedidos
        </button>
    
    </div>

    <ul>
        @forelse ($orders as $order)
            <li>
                <div class="order" style="opacity: {{$order->status === 'entregado' ? '0.8' : '1'}}">
    
                    <div 
                        class="label"
                        style="background-color: {{$order->status === 'entregado' ? '#3E7761' : '#cf2e2f;'}}"
                    >                        
                        <span
                        class="{{$order->status === 'entregado' ? 'delivered' : ''}}"
                        >
                            {{$order->status}}
                        </span>
                    </div>
                    
                    <h4>Pedido de <span class="order-name">{{$order->user->name}}</span></h4>
                    <small class="order-date">{{$order->created_at->format('d/m/Y')}}</small>
                    <p>Cantidad De Productos: {{$order->quantity}}</p>
                    
                    <div class="order-buttons-container">
                        <button class="app-button">
                            <a href="{{route('order.show', [$order])}}">Ver detalle </a>
                        </button>
        
                        @can('update', $order)
                            <button class="app-button edit">
                                <a href="{{ route('order.edit', [ $order ]) }}">Editar</a>
                            </button>
                        @endcan
        
                        @can('delete', $order)
                            <form action="{{ route('order.delete', [ $order ]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="app-button-danger">Eliminar</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </li>
        @empty
            <h2>No hay pedidos</h2>
        @endforelse
    </ul>
</div>
