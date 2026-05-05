<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInteractionRequest;
use App\Models\Customer;
use App\Models\Interaction;
use Illuminate\Http\Request;

class InteractionController extends Controller
{
    //
    public function store(StoreInteractionRequest $request, Customer $customer)
    {
        $this->authorizeCustomer($customer);
        $customer->interactions()->create(
            $request->validated()
        );
        return redirect()->route('customers.show', $customer)->with('success', 'Interaction created sucessfully.');
    }

    public function destroy(Interaction $interaction){
        $this->authorizeInteraction($interaction);
        $interaction->delete();
        return back()->with('success','Interaction deleted successfully!');
    }

    private function authorizeInteraction(Interaction $interaction)
    {
        if ($interaction->customer->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action!');
        }
    }

    private function authorizeCustomer(Customer $customer)
    {
        if ($customer->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
