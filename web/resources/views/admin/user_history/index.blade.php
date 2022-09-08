<x-admin-layout>
  <h2 class="text-2xl font-bold text-center mt-8 mb-12">利用履歴</h2>

  <table class="table-auto w-full">
      <thead>
          <tr class="border-b-4">
              <th class="w-1/12 px-1 py-2 text-left">ID</th>
              <th class="w-1/12 px-2 py-2 text-left">返却済み</th>
              <th class="w-1/6 px-2 py-2 text-left">利用期間</th>
              <th class="w-1/12 px-2 py-2 text-left">利用者</th>
              <th class="w-1/3 px-2 py-2 text-left">備品名</th>
          </tr>
      </thead>
      <tbody>
          @foreach($usage_histories as $usage_history)
              <tr class="border-y-2 table-auto">
                  <td class="px-1 py-6">{{ $usage_history->id }}</td>
                  <td class="px-2 py-6">{{ $usage_history->is_returned ? "はい" : "いいえ" }}</td>
                  <td class="px-2 py-6">{{ $usage_history->start_at }} ~ {{  $usage_history->return_at }}</td>
                  <td class="px-2 py-6">{{ $usage_history->user->name }}</td>
                  <td class="px-2 py-6 flex items-center"> <img src="{{ \Storage::url($usage_history->item->image_path) }}" alt="" width="40" class="mr-5">{{ $usage_history->item->name }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
</x-admin-layout>