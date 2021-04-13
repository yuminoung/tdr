<div>
    <div>
        @if($listing->discount_price)
        <button wire:click="removeDiscount" wire:loading.class="hidden">End Discount</button>
        <div wire:loading wire:target="removeDiscount">
            Removing...
        </div>
        @else
        <button wire:click="addDiscount" wire:loading.class="hidden">10%</button>
        <div wire:loading wire:target="addDiscount">
            Adding...
        </div>
        @endif
    </div>
</div>
