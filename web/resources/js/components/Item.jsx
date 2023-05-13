import React from 'react';

export default function Item(props) {

    var d=new Date(props.date);  //converts the string into date object
    var month = d.getMonth()+1;
    var day = d.getDate();
    var date=month+"."+day;

    var type = "";
    switch (props.type) {
        case 1:
            type = "Morning";
            break;
        case 2:
            type = "Lunch";
            break;
        case 3:
            type = "Dinner";
            break;
        case 4:
            type = "Snack";
            break;
        default:
            type = "Morning";
    }
    
    return (
        <div>
            <img src={"../images/data/" + props.url} />
            <p className="note">{date + "." + type}</p>
        </div>
    );
}
