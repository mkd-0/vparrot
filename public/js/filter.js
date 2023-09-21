<script>
    <NewData>
        <section className='cars-card-container'>
            {filteredData.map(element => (
                <div className='multiple-div-card'>
                    <Carscard carid={element}></Carscard>
                </div>
                            ))}
        </section>
    </NewData >

    <NormalData>
        <section className='cars-card-container'>
            {data.map(element => (
                <div className='multiple-div-card'>
                    <Carscard carid={element}></Carscard>
                </div>
            ))}
        </section>
    </NormalData>
</script>
