<div>
    <div>
        @if($discount)
        <button wire:click="removeDiscount">End Discount</button>
        <div wire:loading wire:target="removeDiscount">
            Removing...
        </div>
        @else
        <button wire:click="addDiscount">10%</button>
        <div wire:loading wire:target="removeDiscount">
            Adding...
        </div>
        @endif
    </div>
</div>
