<x-layout>
<section class="pt-10">
            <x-section-heading>Expenses list</x-section-heading>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach ($expenses as $expense)
                    <x-expense-card :expense="$expense" />
                @endforeach
            </div>
        </section>
</x-layout>