# Enum Implementation

## Description

This branch was made as extra with the purpose of implement the Enum class in the project.
By the time im writing this README, for simple attributes I dont see a point on why not to use a enum instead of make an extended field.

With this approach, we can make the code more readable and easy to understand instead of create a dynamic like field which is less readable.

## How to create the enum

### 1. Create the Enum class

```php
namespace Fantasy\Bundle\DemoBundle\Enum;

enum EType: string
{
    case WEB = 'web';
    case LOCAL = 'local';
    case DUAL = 'dual';
}
```

### 2. Use the Enum class

With this approach, we can use the Enum class as a type of the attribute. Which makes the code more readable and easy to understand at least for me,
while the dynamic like field is a little bit more complex to understand.

```php
    /**
     * @ORM\Column (type="string", length=50, enumType=EType::class)
     * @ConfigField(
     *     extend={
     *         "is_extend"=true,
     *     }
     * )
     */
    private ?EType $type = null;
    
// Getters and Setters
```

Its also more easy to implement in the migrations or installer

```php
    $table->addColumn('type', 'EType', ['length' => 50, 'notnull' => false]);
```

### 3. Use the Enum class in the form

There are different ways to use the Enum class in the form, here are the different implementations.
[Symfony Docs Enum Forms](https://symfony.com/doc/current/reference/forms/types/enum.html#multiple)


While the next code is a trivial implementation, it can be used as a reference to implement the Enum class in the form.
Check the Form/Type/DemoEntity for a more readable way.
```php
    $builder
        ->add('type', ChoiceType::class, [
            'choices' => [
                'Web' => EType::WEB,
                'Local' => EType::LOCAL,
                'Dual' => EType::DUAL,
            ],
            'label' => 'Type',
            'required' => false,
            'placeholder' => 'Choose an option',
        ])
    ;
```

### 4. Use the Enum class in the grid

There is a key difference also with the datagrid, while the extended field doesnt need to be selected, the enums need it to be shown in the grid.
Have in mind that the enum is a different type of field like string, int etc. So it needs a formatter to be shown

> [!WARNING] 
> If the type of enum is not specified it will drop an error as it doesnt have a magic method toString**

```yaml
    demo-entity-grid:
        extended_entity_name: Fantasy\Bundle\DemoBundle\Entity\DemoEntity
        source:
            type: orm
            query:
                select:
                    - d.id
                    - d.name
                    - d.description
                    - d.type
                from:
                    - { table: 'Fantasy\Bundle\DemoBundle\Entity\DemoEntity', alias: d }
        columns:
            id:
                label: 'ID'
            name:
                label: 'Name'
            description:
                label: 'Description'
            type:
                label: 'Type'
                type: enum_type
```
### 5. Create the formatter

This is an example of a simple formatter, which takes the enums and translate their values to a more readable format.

```php 
namespace Fantasy\Bundle\DemoBundle\Formatter;

class EnumDataTransformer extends AbstractProperty
{
    public function getRawValue(ResultRecordInterface $record)
    {
        $value = $record->getValue($this->get(self::NAME_KEY));

        if ($value instanceof EType) {
            return $value->getLabel();
        }

        return 'N/A';
    }
}

```

### 6. Register the formatter

The formatter needs to be registered in the services.yml file, with the tag oro_datagrid.extension.formatter.property and the type of the field.
The type of the field is the same as the one in the grid to be properly formatted.

```yaml
    Fantasy\Bundle\DemoBundle\Formatter\EnumDataTransformer:
        tags:
            - { name: oro_datagrid.extension.formatter.property, type: enum_type }
```
