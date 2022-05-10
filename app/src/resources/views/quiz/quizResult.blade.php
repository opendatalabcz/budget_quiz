<x-layout>
    <h1>Výsledky kvízu</h1>
    <p class="lead">Níže naleznete souhrn Vaších odpovědí, porovnání s ostatními respondenty a výsledek Vaších voleb</p>

    <h2>Vaše výsledky rozpočtů:</h2>
    <div class="table-responsive mb-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Rok</th>
                    <th>Výsledek rozpočtu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ config('app.first_year') }}</td>
                    <td>{{ number_format($budgetResults[0], 0, null, ' ') }}&nbsp;Kč</td>
                </tr>
                <tr>
                    <td>{{ config('app.second_year') }}</td>
                    <td>{{ number_format($budgetResults[1], 0, null, ' ') }}&nbsp;Kč</td>
                </tr>
                <tr>
                    <td>{{ config('app.third_year') }}</td>
                    <td>{{ number_format($budgetResults[2], 0, null, ' ') }}&nbsp;Kč</td>
                </tr>
            </tbody>
        </table>
    </div>

    <h2>Srovnání Vaších odpovědí s většinovými odpovědmi:</h2>
    <div class="table-responsive mb-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Otázka</th>
                    <th>Vaše odpověď</th>
                    <th>Většinová odpověď</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                    <tr>
                        <td>{{ $question->title }}</td>
                        <td>{{ $questionUserAnswer[$question->id]->title }}</td>
                        <td>{{ $questionMajorityAnswer[$question->id]->title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
