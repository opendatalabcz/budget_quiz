<x-layout>
    <h1>Výsledky kvízů</h1>
    <p class="lead">Níže naleznete souhrn všech odpovědí dle politických stran, které by respondenti volili.</p>

    <div class="row">
        @foreach($parties as $party)
            <div class="col-md-6">
                <div class="border border-secondary rounded p-3 m-3">
                    <h2>{{ $party->displayName() }}</h2>

                    @foreach($questions as $question)
                        <div class="mt-3">
                            <h3>Otázka {{ $question->title }}</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Odpověď</th>
                                            <th>Počet odpovědí</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($question->answers as $answer)
                                        <tr>
                                            <td>{{ $answer->title }}</td>
                                            <td>{{ $partyToAnswerCounts[$party->id][$answer->id] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
