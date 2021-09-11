@extends('admin.admin')

@section('content')

<div class="container-fluid">
@include('info.notification')

<h1>Payments Users</h1>
    <table class="table table-condensed">
        <thead>
            <tr class="card-table">
                <th>ID</th>
                <th>Amount</th>
                <th>Status Stripe</th>
                <th>Facture</th>
                <th>Date payment</th>
            </tr>
        </thead>

        <tbody>
        @forelse($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->amount }} €</td>
                <td class="btn btn-info">{{ $payment->status }}</td>
                <td><a href="{{ $payment->receipt_url}}" class="btn btn-primary">Reçu Inscription</a></td>
                <td>{{ $payment->created_at }}</td>
              </td>
            </tr>
            @empty 
            <p>Aucun user trouvé sur la base de données.</p>
            @endforelse
        </tbody>
        
    </table>
    <p>{{ $payments->links() }}</p>
</div>

@endsection




