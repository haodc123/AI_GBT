import React from 'react';
import { useState } from "react";
import { useEffect } from "react";
import Item from "./Item";

export default function ListItem() {

    var active = 'active';
    var inactive = 'inactive';
    var per_page = 4;
    const filter_init_arr = [
        {
            type: "morning",
            status: 1,
        },
        {
            type: "lunch",
            status: 1,
        },
        {
            type: "dinner",
            status: 1,
        },
        {
            type: "snack",
            status: 1,
        }
    ];
    const [filter_arr, setMealFilterArr] = useState(filter_init_arr);
    const [items, setItems] = useState([]);
    const [last_item, setLastItem] = useState(per_page);

    const handleFilter = (_type) => {
        setMealFilterArr(
            filter_arr.map((item) =>
                item.type === _type
                    ? item.status === 0 ? { ...item, status: 1 } : { ...item, status: 0 }
                    : { ...item }
            )
        );
    };
    const handleLoadMore = () => {
        setLastItem(prevLast => prevLast + per_page);
    };

    useEffect(() => {
        var url = '/api_get_items/'+filter_arr[0]['status']+'/'+filter_arr[1]['status']+'/'+filter_arr[2]['status']+'/'+filter_arr[3]['status']+"/"+last_item;
        fetch(url)
            .then(res => res.json())
            .then(items => {
                setItems(items);
                console.log(items);
            })
    }, [filter_arr, last_item])
    
    return (
        <div className="row items">
            <ul className=' row item-filter'>
                <li id="morning" className={filter_arr[0]['status'] == 1 ? active : inactive}
                    onClick={() => handleFilter('morning')}>Morning</li>
                <li id="lunch" className={filter_arr[1]['status'] == 1 ? active : inactive}
                    onClick={() => handleFilter('lunch')}>Lunch</li>
                <li id="dinner" className={filter_arr[2]['status'] == 1 ? active : inactive}
                    onClick={() => handleFilter('dinner')}>Dinner</li>
                <li id="snack" className={filter_arr[3]['status'] == 1 ? active : inactive}
                    onClick={() => handleFilter('snack')}>Snack</li>
            </ul>
            <ul className="row item-list">
                {items.map(item => (
                    <li className="col-lg-3 col-md-3 col-sm-3" key={item.id}>
                        <Item
                            type={item.item_type}
                            date={item.item_date}
                            url={item.item_url}
                        />
                    </li>
                    // <li key={item.id}>{item.item_url}</li>
                ))}
            </ul>
            <div className='row load-more'>
                <button onClick={handleLoadMore}>Load more</button>
            </div>
        </div>
        
    );
}
