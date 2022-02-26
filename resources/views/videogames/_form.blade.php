    <label >
        Title
        <input type="text" name = "title" value="{{ old('title', $videogame -> title)}}">
    </label> <br>
    <label >
        Rating
        <select name="rating" id=""  value="{{ old('rating', $videogame -> rating)}}">
            <option selected="true" disabled="disabled">Select a rating...</option>
            <option {{ $videogame -> rating == "Everyone" ? 'selected' : ''}}>Everyone</option>
            <option {{ $videogame -> rating == "Everyone 10+" ? 'selected' : ''}}>Everyone 10+</option>
            <option {{ $videogame -> rating == "Teen" ? 'selected' : ''}}>Teen</option>
            <option {{ $videogame -> rating == "Mature 17+" ? 'selected' : ''}}>Mature 17+</option>
            <option {{ $videogame -> rating == "Adults Only 18+" ? 'selected' : ''}}>Adults Only 18+</option>
            <option {{ $videogame -> rating == "Rating Pending" ? 'selected' : ''}}>Rating Pending</option>
            <option {{ $videogame -> rating == "Rating Pending-Likely Mature 17+" ? 'selected' : ''}}>Rating Pending-Likely Mature 17+</option>
        </select>
    </label> <br>
    <label >
        Videogame console
        <select name="console" id="" value="{{ old('console', $videogame -> console)}}">
            <option selected="true" disabled="disabled">Select a console...</option>
            <option {{ $videogame -> console == "Nintendo Switch" ? 'selected' : ''}}>Nintendo Switch</option>
            <option {{ $videogame -> console == "PlayStation 4" ? 'selected' : ''}}>PlayStation 5</option>
            <option {{ $videogame -> console == "PlayStation 5" ? 'selected' : ''}}>PlayStation 4</option>
            <option {{ $videogame -> console == "Xbox Series X|S" ? 'selected' : ''}}>Xbox Series X|S</option>
        </select>
    </label> <br>
    <label>
        Purchase Price
        <input type="number" name = "purchase_price" step="0.01" value="{{ old('purchase_price', $videogame -> purchase_price)}}">
    </label> <br>
    <label >
        Sale Price
        <input type="number" name = "sale_price" step="0.01" value="{{ old('sale_price', $videogame -> sale_price)}}">
    </label> <br>
    <label >
        URL
        <input type="text" name = "url" value="{{old('url', $videogame -> url) }}">
    </label> <br>