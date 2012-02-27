
<div>
    <h1>{$text.title}</h1>
    <p>{$text.text}</p>
Parkovani {$parking} Kc/den<br/>
Snidane  {$breakfast} Kc/den (jen pro skupinku 4 a vice lidi) </br>
<table>
    <tr>
        <th>Pocet dnu</th><th>Jedna osoba</th><th>Dve osoby</th><th>Tri osoba</th><th>Ctiri a vice</th>
    </tr>
    {foreach from=$day_tax item=tax name=days}
    <tr>
        <td>{$smarty.foreach.days.index + 1}</td>
        <td>{$tax.0}</td>
        <td>{$tax.1}</td>
        <td>{$tax.2}</td>
        <td>{$tax.3}</td>
    </tr>
    {/foreach}
</table>
</div>    