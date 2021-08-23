import React, { useState, useEffect } from 'react';
import { Table, Button } from 'react-bootstrap';
import ReactDOM from 'react-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
// import { Button } from "module";

function Example() {
    const [data, setData] = useState([])
    useEffect(() => {
        getData([]);
    }, [])

    async function getData() {
        let result = await fetch("http://127.0.0.1:8000/api/post/");
        result = await result.json();
        setData(result)
        // console.log(result)
    }
    return (
        <>
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-12 col-lg-12">
                        <div className="card">
                            <div className="card-header">Liste de tous les Posts</div>
                            <Table>
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>title</td>
                                        <td>Sous-titre</td>
                                        <td>Description</td>
                                    </tr>
                                </thead>
                                {
                                    data.map((item, id) =>
                                        <tbody key={id}>
                                            <tr >
                                                <td>{item.id}</td>
                                                <td>{item.title}</td>
                                                <td>{item.subtitle}</td>
                                                <td>{item.content}</td>
                                            </tr>
                                        </tbody>
                                    )
                                }
                            </Table>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}


{/* <div className="container">
    <div className="row justify-content-center">
        <div className="col-md-8">
            <div className="card">
                <div className="card-header">Welcomme Home</div>

                <div className="card-body">Liste de tous les Posts</div>
                <div className="card-footer">Liste de tous les Posts</div>
            </div>
        </div>
    </div>
</div> */}