<div class="flex flex-col">
	<div class="-my-2 sm:-mx-6 lg:-mx-8">
		<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
			<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
				<table class="min-w-full divide-y divide-gray-200">
					<thead class="bg-gray-50">
						<tr>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Title
							</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Platform
							</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Price
							</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Action
							</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200">
						@foreach($listings as $listing)
						<tr>
							<td class="px-6 py-4 whitespace-nowrap">
								<div class="text-sm text-gray-900 max-w-3xl overflow-hidden">
									{{ $listing->title }}
								</div>
							</td>
							<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
								{{$listing->presentPlatform()}}
							</td>
							<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
								{{$listing->presentPrice()}}
							</td>
							<td class="px-6 py-4" x-data="{ open: false }">
								<button @click="open = !open"
									class="text-sm bg-gray-50 shadow rounded px-4 py-2 text-gray-500 focus:outline-none">
									Action
								</button>
								<ul class="mt-2 list-none absolute bg-gray-50 rounded shadow border border-gray-300"
									x-show="open" @click.away="open = false">
									<li>
										<a href="#" class="px-4 py-2 block hover:bg-gray-100 rounded-t">Edit</a>
									</li>
									<li>
										<a href="#" class="px-4 py-2 block hover:bg-gray-100">Delete</a>
									</li>
									@if($listing->presentPlatform() === 'Catch')
									<li>
										<form action="{{ route('catch.download', $listing->product) }}" method="POST">
											<button class="px-4 py-2 block hover:bg-gray-100">Download</button>
											@csrf
										</form>
									</li>
									@endif
									<li>
										<a href="https://www.kogan.com/au/shop/?q={{str_replace(" ","+", $listing->title)}}"
											class="px-4 py-2 block hover:bg-gray-100 rounded-b" target="_blank">View</a>
									</li>
								</ul>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
