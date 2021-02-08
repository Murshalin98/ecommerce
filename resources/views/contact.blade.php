<table class="table">
    <thead>
      <tr>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
      <tr>
        <td>{{ $item->id}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
