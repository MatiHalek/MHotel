class Term
{
    #dateFrom;
    #dateTo;
    #room;
    constructor(dateFrom, dateTo, room){
        this.#dateFrom = dateFrom;
        this.#dateTo = dateTo;
        this.#room = room;
    }
    static GetDateFrom(obj){
        if(#dateFrom in obj)
            return obj.#dateFrom;
        return "Object must be an instance of Term.";
    }
    static GetDateTo(obj){
        if(#dateTo in obj)
            return obj.#dateTo;
        return "Object must be an instance of Term.";
    }
    static GetRoom(obj){
        if(#room in obj)
            return obj.#room;
        return "Object must be an instance of Term.";
    }
}
const terms = Array();